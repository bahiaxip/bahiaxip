function editor_init(field){
    //CKEDITOR.plugins.addExternal('codesnippet',base+'/static/libs/ckeditor/plugins/codesnippet/','plugins.js');
    CKEDITOR.replace(field,{
        language: '{{app()->getLocale()}}',
        filebrowserUploadUrl:'/upload',
        fileTools_requestHeaders:{
            'X-Requested-With':'XMLHttpRequest',
            'X-CSRF-TOKEN':'{{csrf_token()}}'
        },
        //skin y extraPlugins no están instalados
        //skin:'mono',
        //extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
        toolbar:[
        { name:'clipboard', items:['Cut','Copy','Paste','PasteText','-','Undo','Redo']},
        //{ name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink','Blockquote']},
        //eliminamos 'Image','Link' y 'Unlink' temporalmente
        { name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Blockquote']},
        { name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']}
        ]
    })
}
