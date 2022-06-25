$(document).ready(function () {
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if(link == location2){
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

        }
    });

    $('.delete-btn').click(function () {
        var res = confirm('Подтвердите действия');
        if(!res){
            return false;
        }
    });
})

tinymce.init({
    selector: 'textarea',
    language: "ru",
    plugins: 'wordcount link preview autolink paste',
    paste_as_text: true,
    menubar: false,
    branding: false,
    toolbar_mode: 'floating',
    relative_urls: false,
    toolbar: "undo redo | bold italic underline strikethrough | superscript subscript | link | preview | removeformat",
    contextmenu: false,
    invalid_elements :'br,div,img,table,td,th,tr,header,body,h1,h2,h3,h4,h5,article,li,ul',
    invalid_styles: 'color font-size font-weight font-style font-family background-color box-sizing margin padding max-width line-height white-space -webkit-tap-highlight-color',
    entity_encoding: 'raw',
    setup: function(ed)
    {

        var elem = $(ed.getContainer()); //tinymce container
        var id = this.id;  // the id of the html textarea
        var limit = parseInt($("#" + (id)).attr("maxlength"));

        ed.on('keyup', function(e)
        {
            /* we use format:text to count just the text and not the html tags for proper length */
            var tlength = tinymce.activeEditor.getContent({format:"raw"}).length;

            /* we get the plain text value to use in the truncate below */
            var ttext  = tinymce.activeEditor.getContent({format:"raw"});
            var truncated_text = ttext.substring(0, limit);

            if(tlength > limit)
            {
                /* truncate the text */
                tinymce.activeEditor.setContent(truncated_text);
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                return false;
            }
        }); //close on keyup
    }
});
