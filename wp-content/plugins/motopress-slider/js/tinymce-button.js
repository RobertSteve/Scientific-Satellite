jQuery(function(){if(mpslSliderList&&mpslSliderList.length&&"undefined"!==typeof tinymce&&"undefined"===typeof MPSL){var b=[];mpslSliderList.forEach(function(a){b.push({text:a.title,value:a.shortcode})});tinymce.PluginManager.add("mpslTinymceSliderList",function(a){a.addButton("mpsl_slider_list_btn",{type:"menubutton",text:mpslLang.title,icon:!1,menu:b,onselect:function(a){tinymce.activeEditor.selection.setContent(a.control.settings.value)}})})}});
