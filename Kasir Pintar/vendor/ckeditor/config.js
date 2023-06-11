/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    config.extraPlugins = 'wordcount,notification,htmlwriter';
    // Define changes to default configuration here.
    // For complete reference see:
    // https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

    // The toolbar groups arrangement, optimized for a single toolbar row.
    config.toolbarGroups = [{
            name: 'document',
            groups: ['mode', 'document', 'doctools']
        },
        {
            name: 'editing',
            groups: ['find', 'selection', 'spellchecker', 'editing']
        },
        {
            name: 'forms',
            groups: ['forms']
        },
        {
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup']
        },
        {
            name: 'clipboard',
            groups: ['clipboard', 'undo']
        },
        {
            name: 'paragraph',
            groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
        },
        {
            name: 'links',
            groups: ['links']
        },
        {
            name: 'insert',
            groups: ['insert']
        },
        {
            name: 'styles',
            groups: ['styles']
        },
        {
            name: 'colors',
            groups: ['colors']
        },
        {
            name: 'tools',
            groups: ['tools']
        },
        {
            name: 'others',
            groups: ['others']
        },
        {
            name: 'about',
            groups: ['about']
        }
    ];

    // The default plugins included in the basic setup define some buttons that
    // are not needed in a basic editor. They are removed here.
    config.removeButtons = 'Cut,Anchor,Strike,Subscript,Superscript,About,Link,Unlink,Outdent,Indent';

    // Dialog windows are also simplified.
    config.removeDialogTabs = 'link:advanced';

    // config.contentsCss = '<ckeditor root folder>/contents.css';

    config.wordcount = {

        // Whether or not you want to show the Paragraphs Count
        showParagraphs: false,

        // Whether or not you want to show the Word Count
        showWordCount: false,

        // Whether or not you want to show the Char Count
        showCharCount: true,

        // Whether or not you want to count Spaces as Chars
        countSpacesAsChars: false,

        // Whether or not to include Html chars in the Char Count
        countHTML: false,

        // Maximum allowed Word Count, -1 is default for unlimited
        maxWordCount: -1,

        // Maximum allowed Char Count, -1 is default for unlimited
        maxCharCount: 2000,

        // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
        filter: new CKEDITOR.htmlParser.filter({
            elements: {
                div: function(element) {
                    if (element.attributes.class == 'mediaembed') {
                        return false;
                    }
                }
            }
        })
    };
};