(function() {
	tinymce.PluginManager.add('essco_image_shuffle', function(editor, url) {
		// Add a button that opens a window
		editor.addButton('essco_image_shuffle_btn', {
			text : '',
			icon : false,
			image : url + '/shuffle-icon.png',
			onclick : function() {
				// Open window
				editor.windowManager.open({
					title : 'Add Image Shuffle',
					body : [{
						type : 'textbox',
						name : 'title',
						label : 'Title'
					},
					{
						type : 'textbox',
						name : 'subtitle',
						label : 'Sub Title'
					},
					{
						type : 'textbox',
						name : 'target',
						label : 'Target'
					},
					{
                        type: 'listbox', 
                        name: 'intensity', 
                        label: 'Intensity', 
                        'values': [
                            {text: '10', value: 10},
                            {text: '25', value: 25},
                            {text: '50', value: 50},
                            {text: '75', value: 75},
                            {text: '100', value: 100},
                            {text: '150', value: 150},
                            {text: '200', value: 200},
                        ]
                    },
					{
                        type: 'textbox',
                        subtype: 'hidden',
                        name: 'images',
                        id: 'hiddenID'
                    },
					{
                        type: 'button',
                        text: 'Choose Images',
                        onclick: function(e){
                            e.preventDefault();
                            var hidden = jQuery('#hiddenID');
                            
                            var custom_uploader = wp.media.frames.file_frame = wp.media({
                                title: 'Choose an image',
                                button: {text: 'Select Images'},
                                multiple: true
                            });
                            
                            custom_uploader.on('select', function() {
                                var selection = custom_uploader.state().get('selection');
				                var ids = selection.map( function (attachment) {
				                    return attachment.id;
				                });
				                hidden.val(ids.join(','));
                            });
                            
                            custom_uploader.open();
                        }
                    }
					],
					onsubmit : function(e) {
						// Insert content when the window form is submitted
						
						editor.insertContent('[shuffle-images images="'+e.data.images+'" target="'+e.data.target+'" title="'+e.data.title+'" subtitle="'+e.data.subtitle+'" intensity="'+e.data.intensity+'" /]');
						
						// [shuffle-images images="" href="" title="" subtite="" intensity="" /]
						
					}
				});
			}
		});

	});

} )(); 