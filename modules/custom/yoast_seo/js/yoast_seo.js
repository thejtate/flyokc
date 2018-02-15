/**
 * JavaScript file that handles initializing and firing the Yoast
 * js-text-analysis library.
 */
(function ($) {
  Drupal.yoast_seo = Drupal.yoast_seo || {};

  Drupal.behaviors.yoast_seo = {
    attach: function (context, settings) {
      // Making sure we actually have data.
      if (typeof settings.yoast_seo != 'undefined') {
        // Making sure we only initiate Yoast SEO once.
        $('body', context).once('yoast_seo', function() {

          YoastSEO.analyzerArgs = {
            source: YoastSEO_DrupalSource,
            analyzer: settings.yoast_seo.analyzer,
            snippetPreview: settings.yoast_seo.snippetPreview,
            elementTarget: [settings.yoast_seo.targetId],
            typeDelay: 300,
            typeDelayStep: 100,
            maxTypeDelay: 1500,
            dynamicDelay: true,
            multiKeyword: false,
            targets: {
              output: settings.yoast_seo.targets.output,
              overall: settings.yoast_seo.targets.overall,
              snippet: settings.yoast_seo.targets.snippet
            },
            snippetFields: {
              title: "snippet_title",
              url: "snippet_cite",
              meta: "snippet_meta"
            },
            sampleText: {
              url: settings.yoast_seo.defaultText.url,
              title: settings.yoast_seo.defaultText.title,
              keyword: settings.yoast_seo.defaultText.keyword,
              meta: settings.yoast_seo.defaultText.meta,
              text: settings.yoast_seo.defaultText.body
            },
            fields: {
              keyword: settings.yoast_seo.fields.focusKeyword,
              title: settings.yoast_seo.fields.pageTitle,
              nodeTitle: settings.yoast_seo.fields.nodeTitle,
              meta: settings.yoast_seo.fields.description,
              text: settings.yoast_seo.fields.bodyText,
              url: settings.yoast_seo.fields.url,
              pathauto: settings.yoast_seo.fields.pathauto
            },
            placeholderText: {
              title: settings.yoast_seo.placeholderText.title,
              description: settings.yoast_seo.placeholderText.description,
              url: settings.yoast_seo.placeholderText.url
            },
            patterns : {
              title: '%%title%% | %%site-name%%'
            },
            SEOTitleOverwritten: settings.yoast_seo.SEOTitleOverwritten,
            siteName: settings.yoast_seo.siteName,
            scoreElement: settings.yoast_seo.fields.seoStatus,
            baseRoot: settings.yoast_seo.baseRoot,
            isEditable: settings.yoast_seo.isEditable
          };

          // Create a new Yoast SEO instance.
          if (typeof YoastSEO != "undefined") {
            var DrupalSource = new YoastSEO_DrupalSource(YoastSEO.analyzerArgs);

            // Declaring the callback functions, for now we bind DrupalSource.
            YoastSEO.analyzerArgs.callbacks = {
              getData: DrupalSource.getData.bind(DrupalSource),
              getAnalyzerInput: DrupalSource.getAnalyzerInput.bind(DrupalSource),
              bindElementEvents: DrupalSource.bindElementEvents.bind(DrupalSource),
              updateSnippetValues: DrupalSource.updateSnippetValues.bind(DrupalSource),
              saveScores: DrupalSource.saveScores.bind(DrupalSource)
            };

            // Make it global.
            window.YoastSEO.app = new YoastSEO.App( YoastSEO.analyzerArgs );

            // Parse the input from snippet preview fields to their corresponding metatag and path fields
            DrupalSource.parseSnippetData( YoastSEO.analyzerArgs.snippetFields.title, YoastSEO.analyzerArgs.fields.title );
            DrupalSource.parseSnippetData( YoastSEO.analyzerArgs.snippetFields.url, YoastSEO.analyzerArgs.fields.url );
            DrupalSource.parseSnippetData( YoastSEO.analyzerArgs.snippetFields.meta, YoastSEO.analyzerArgs.fields.meta );

            // No enter on contenteditable fields.
            $("#snippet_title, #snippet_cite, #snippet_meta").keypress(function(e) {
              if (e.keyCode == 13) {
                e.preventDefault();
              }
            });
            $("#snippet_title, #snippet_cite, #snippet_meta").prop('contenteditable', settings.yoast_seo.isEditable);

            if (typeof CKEDITOR !== "undefined") {
              CKEDITOR.on('instanceReady', function( ev ) {
                var editor = ev.editor;
                
                // Check if this the instance we want to track.
                if (editor.name == YoastSEO.analyzerArgs.fields.text) {
                  editor.on('change', function() {
                    // Let CKEditor handle updating the linked text element.
                    editor.updateElement();
                    // Dispatch input event so Yoast SEO knows something changed!
                    DrupalSource.triggerEvent(editor.name);
                  });
                }
              });
            }
            if(typeof tinyMCE !=="undefined") {
              tinyMCE.onAddEditor.add(function(mgr,ed) {

                ed.onChange.add(function(ed, l) {
                  ed.save();
                  DrupalSource.triggerEvent(ed.id);
                });
              });
            }
          }
          else {
            $('#' + settings.yoast_seo.targets.output).html('<p><strong>' + Drupal.t('It looks like something went wrong when we tried to load the Yoast SEO content analysis library. Please check it the module is installed correctly.') + '</strong></p>');
          }
        });
      }
    }
  }
})(jQuery);

/**
 * Inputgenerator generates a form for use as input.
 * @param args
 * @param refObj
 * @constructor
 */
YoastSEO_DrupalSource = function(args) {
  this.config = args;
  this.refObj = {};
  this.analyzerData = {};
  this.formattedData = {};
};

/**
 * Sets field value and dispatches an event to fire content analysis magic
 * @param field
 */
YoastSEO_DrupalSource.prototype.triggerEvent = function(field) {
  if ("createEvent" in document) {
    var ev = document.createEvent("HTMLEvents");
    ev.initEvent("input", false, true);
    document.getElementById(field).dispatchEvent(ev);
  }
  else {
    document.getElementById(field).fireEvent("input");
  }
}

/**
 * Parses the input in snippet preview fields on input evt to data in the metatag and path fields
 * @param source
 * @param target
 */
YoastSEO_DrupalSource.prototype.parseSnippetData = function(source, target) {
  var listener = function ( ev ) {
    // textContent support for FF and if both innerText and textContent are
    // undefined we use an empty string.
    var elem = document.getElementById(target);
    elem.value = (ev.target.innerText || ev.target.textContent || "");
    if(elem.disabled) {
      elem.disabled = false;
    }
    this.triggerEvent(target);
  }.bind(this);
  if(this.config.isEditable) {
    document.getElementById(source).addEventListener("blur", listener);
  }
}


/**
 * Grabs data from the refObj and returns populated analyzerData
 * @returns analyzerData
 */
YoastSEO_DrupalSource.prototype.getData = function() {
  // Default data in here.
  var data = {
    keyword: this.getDataFromInput( "keyword" ),
    meta: this.getDataFromInput( "meta" ),
    snippetMeta: this.getDataFromInput( "meta" ),
    text: this.getDataFromInput( "text" ),
    snippetTitle: this.getDataFromInput( "title" ),
    nodeTitle: this.getDataFromInput( "nodeTitle" ),
    pageTitle: this.getDataFromInput( "title" ),
    baseUrl: this.config.baseRoot + '/',
    url: this.config.baseRoot + '/' + this.getDataFromInput( "url" ),
    snippetCite: this.getDataFromInput( "url" )
  };



    // Placeholder text in snippet if nothing was found.
    if (data.meta == '') {
      data.snippetMeta = this.config.placeholderText.description;
    }
    if (data.pageTitle == '') {
      data.snippetTitle = this.config.placeholderText.title;
    }
    if (data.snippetCite == '') {
      data.snippetCite = this.config.placeholderText.url;
    }

    if (data.meta != '') {
      if (data.text == '' || this.getMetaFromText(data.text) != data.meta) {
        this.config.SEOMetaOverwritten = true;
      }
    }

    if (data.pageTitle != '') {
      if (data.nodeTitle == '' || this.getMetaTitleFromTitle(data.nodeTitle) != data.pageTitle) {
        this.config.SEOTitleOverwritten = true;
      }
    }
  if(!this.config.isEditable) {

    data.snippetMeta = this.getMetaFromText(this.config.sampleText.meta);

    if (data.snippetMeta == '') {
      data.snippetMeta = this.config.placeholderText.description;
    }

    data.snippetTitle = this.config.sampleText.title;

    if (data.snippetTitle == '') {
      data.snippetTitle = this.config.placeholderText.title;
    }

  }

  return data;
};

/**
 * Initializes the snippetPreview if it isn't there.
 * If it is already initialized, it get's new values from the inputs and rerenders snippet.
 */
YoastSEO_DrupalSource.prototype.getAnalyzerInput = function() {
  if (typeof YoastSEO.app.snippetPreview === "undefined") {
    YoastSEO.app.init();
  }
  else {
    this.updateRawData();
    YoastSEO.app.reloadSnippetText();
  }
  YoastSEO.app.runAnalyzerCallback();
};

YoastSEO_DrupalSource.prototype.getDataFromInput = function( field ) {
  return document.getElementById(this.config.fields[field]).value;
}

/**
 * Grabs data from the refObj and returns populated analyzerData
 * @returns analyzerData
 */
YoastSEO_DrupalSource.prototype.updateRawData = function() {

  var data = {
    keyword: this.getDataFromInput( "keyword" ),
    meta: this.getDataFromInput( "meta" ),
    snippetMeta: this.getDataFromInput( "meta" ),
    text: this.getDataFromInput( "text" ),
    nodeTitle: this.getDataFromInput( "nodeTitle" ),
    snippetTitle: this.getDataFromInput( "title" ),
    pageTitle: this.getDataFromInput( "title" ),
    baseUrl: this.config.baseRoot + '/',
    url: this.config.baseRoot + '/' + this.getDataFromInput( "url" ),
    snippetCite: this.getDataFromInput( "url" )
  };

  if (!this.config.SEOTitleOverwritten) {
    if(data.nodeTitle != '') {
      data.pageTitle = this.getMetaTitleFromTitle(data.nodeTitle);
      data.snippetTitle = data.pageTitle;

      document.getElementById(this.config.fields.title).value = data.pageTitle;
    }
  }

  //Get meta from text
  if(data.text && (!this.config.SEOMetaOverwritten || data.meta == '')) {
    var textMeta = this.getMetaFromText(data.text);

    if(textMeta !== '' && textMeta !== data.meta) {
      data.meta = textMeta;
      data.snippetMeta = textMeta;
      document.getElementById(this.config.fields.meta).value = data.meta;
    }
  }

  // Placeholder text in snippet if nothing was found.
  if (data.meta == '') {
    data.snippetMeta = this.config.placeholderText.description;
  }
  if (data.pageTitle == '') {
    data.snippetTitle = this.config.placeholderText.title;
  }
  if (data.snippetCite == '') {
    data.snippetCite = this.config.placeholderText.url;
  }

  YoastSEO.app.rawData = data;
};

YoastSEO_DrupalSource.prototype.getMetaFromText = function (text) {
  return YoastSEO.StringHelper.prototype.stripAllTags(text).substring( 0, YoastSEO.analyzerConfig.maxMeta );
};

YoastSEO_DrupalSource.prototype.getMetaTitleFromTitle = function(text) {
  return this.config.patterns.title.replace(/%%title%%/g, text).replace(/%%site-name%%/g, this.config.siteName);
};

/**
 * when the snippet is updated, set this data in rawData.
 * @param {string} value
 * @param {string} type
 */
YoastSEO_DrupalSource.prototype.setRawData = function( value, type ) {
  switch ( type ) {
    case 'snippet_meta':
      this.parseSnippetData(type, this.config.fields.meta);
      YoastSEO.app.rawData.snippetMeta = value;
      break;
    case 'snippet_cite':
      YoastSEO.app.rawData.snippetCite = value;
      break;
    case 'snippet_title':
      YoastSEO.app.rawData.snippetTitle = value;
      break;
    default:
      break;
  }
};

/**
 * Calls the eventbinders.
 */
YoastSEO_DrupalSource.prototype.bindElementEvents = function() {
  this.inputElementEventBinder();
};

/**
 * Binds the renewData function on the change of inputelements.
 */
YoastSEO_DrupalSource.prototype.inputElementEventBinder = function() {
  for (field in this.config.fields) {
    if (typeof this.config.fields[field] != 'undefined' && document.getElementById(this.config.fields[field])) {
      document.getElementById(this.config.fields[field]).__refObj = this;
      if(this.config.isEditable) {
        document.getElementById(this.config.fields[field]).addEventListener("input", this.renewData.bind(this));
      }
    }
  }
};

/**
 * calls getAnalyzerinput function on change event from element
 * @param event
 */
YoastSEO_DrupalSource.prototype.renewData = function ( ev ) {

  if ((ev.target.id == this.config.fields.title || ev.target.id == this.config.snippetFields.title)) {

    if (!this.config.SEOTitleOverwritten && ev.target.value != '') {
      this.config.SEOTitleOverwritten = true;
    } else if (ev.target.value == '') {
      this.config.SEOTitleOverwritten = false;
    }
  }

  if ((ev.target.id == this.config.fields.meta || ev.target.id == this.config.snippetFields.meta)) {

    if (!this.config.SEOMetaOverwritten) {
      this.config.SEOMetaOverwritten = true;
    } else if (ev.target.value == '') {
      this.config.SEOMetaOverwritten = false;
    }
  }

  if(ev.target.id == this.config.fields.url) {

    var $elem = jQuery('#' + this.config.fields.pathauto);
    if($elem.length) {
      if(ev.target.value != '' && ev.target.value != this.config.placeholderText.url) {
        $elem.prop('checked', false);
      } else {
        $elem.prop('checked', true);
      }
      $elem.trigger('change');
    }
  }

  YoastSEO.app.analyzeTimer(ev);
};

/**
 * Updates the snippet values, but in reality we ignore this.
 *
 * @param {Object} ev
 */
YoastSEO_DrupalSource.prototype.updateSnippetValues = function( ev ) {
};

/**
 * calles getAnalyzerinput function on focus of the snippet elements;
 * @param event
 */
YoastSEO_DrupalSource.prototype.snippetCallback = function( ev ) {
  this.getAnalyzerInput();
};

/**
 * retuns a string that is used as a CSSclass, based on the numeric score
 * @param score
 * @returns output
 */
YoastSEO_DrupalSource.prototype.scoreRating = function( score ) {
  var scoreRate;
  switch ( score ) {
    case 0:
      scoreRate = "na";
      break;
    case 4:
    case 5:
      scoreRate = "poor";
      break;
    case 6:
    case 7:
      scoreRate = "ok";
      break;
    case 8:
    case 9:
    case 10:
      scoreRate = "good";
      break;
    default:
      scoreRate = "bad";
      break;
  }

  var output = Drupal.t("SEO: <strong>" + scoreRate + "</strong>");

  return output;
};

/**
 * Sets the SEO score in the hidden element.
 * @param score
 */
YoastSEO_DrupalSource.prototype.saveScores = function ( score ) {
  document.getElementById(this.config.targets.overall).getElementsByClassName("score_title")[0].innerHTML = this.scoreRating( score );
  document.getElementById(this.config.scoreElement).value = score;
};
