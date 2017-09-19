// An extended source code plugin viewer for TinyMCE
// Uses jsbeautifier http://jsbeautifier.org/
// P.J.Lawrence July 2014
//
// (1) add to web page script link to beautify-html.js, for example
//      <script src="/<path to>/TinyMCE-js-beautify/js/beautify-html.js"></script>
// (2) add external plugin to tinymce.init code block, for example
//      external_plugins: {
//          "codebeautify": "/<path to>/TinyMCE-js-beautify/TinyMCEplugin/plugin.js"
//      },
// (3) optionaly add to tool bar, for example
//      toolbar: "codebeautify"
// 
//
function looks_like_html(source) {
        // <foo> - looks like html
        var trimmed = source.replace(/^[ \t\n\r]+/, '');
        return trimmed && (trimmed.substring(0, 1) === '<');
}

tinymce.PluginManager.add("codebeautify", function (e) 
{    
    function o()
    {    
        // var o = e.windowManager.open({
        //     title: "Source code beautify",
        //     body: {
        //         type: "textbox",
        //         name: "codebeautify",
        //         multiline: !0,
        //         minWidth: e.getParam("code_dialog_width", 600),
        //         minHeight: e.getParam("code_dialog_height", Math.min(tinymce.DOM.getViewPort().h - 200, 500)),
        //         spellcheck: !1,
        //         style: "direction: ltr; text-align: left"
        //     },
        //     onSubmit: function (o) {
        //         e.focus(), e.undoManager.transact(function () {
        //             e.setContent(o.data.codebeautify)
        //         }), e.selection.setCursorLocation(), e.nodeChanged()
        //     }
        // });
        
        // var HtmlCode=e.getContent({source_view: !0});
        var HtmlCode = tinyMCE.activeEditor.selection.getContent();
        // console.log(tinyMCE.activeEditor.selection.getContent())
        var code         = $(HtmlCode).find("code").text();
        var type_langage = $(HtmlCode).attr('class');
        //console.log(tinyMCE.activeEditor.selection)
        //alert(type_langage)
        if (looks_like_html(HtmlCode) && typeof(js_beautify) === "function") {
         options = {
                    'indent_size': '1',
                    'indent_char': '\t' 
               };
            code = js_beautify(code,options);
        }else {
            options = {
                      'indent_inner_html': false,
                      'indent_size': 2,
                      'indent_char': ' ',
                      'wrap_line_length': 78,
                      'brace_style': 'expand',
                      'unformatted': ['a', 'sub', 'sup', 'b', 'i', 'u'],
                      'preserve_newlines': true,
                      'max_preserve_newlines': 5,
                      'indent_handlebars': false
           }; 
            code = html_beautify(code,options);
        }
        code_beautify ="<pre class='"+type_langage+"'>"+$(HtmlCode).find("code").text(code).parent().html()+"<\pre>";
        // alert(code_beautify)
        tinyMCE.activeEditor.selection.setContent(code_beautify);
        // o.find("#codebeautify").value(HtmlCode)
    }
    e.addButton("codebeautify", {
        icon: "code",
        tooltip: "Source code beautify",
        onclick: o
    }), e.addMenuItem("code beautify", {
        icon: "code",
        text: "Source code beautify",
        context: "tools",
        onclick: o
    })
});