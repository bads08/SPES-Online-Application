/**
  * @name - jqExtension - jQuery file type validation plugin
  * @author - Amol Nirmala Waman http://navayan.com
  * @author - WebDesignColors.com
  * @url - http://webdesigncolors.com/jqextension-jquery-file-type-validation-plugin/
  * @date - 20150727
  * 
  * @usage - 
  * 1. $('#file1').jqExtension();
  * 2. $('#file2').jqExtension({allowed: 'doc,docx,rtf,odt', validMessage: 'Valid', invalidMessage: 'Invalid'});
  */
  
;(function ($) {
  'use strict';
	$.fn.jqExtension = function(options) {
		this.change(function() {
      if (this.type === 'file') {
        var getExt = this.value.split('.').pop().toLowerCase(),
            defaults = {
              allowed: 'jpg,jpeg,png,tiff',
              validMessage: 'Valid file :)',
              invalidMessage: 'Invalid file :(',
            },
            option = $.extend(defaults, options),
            extArray = option.allowed.split(','),
            status = $(this).next('.file-message');

        if ($.isArray(extArray) && $.inArray(getExt, extArray) > -1) {
          //status.text(option.validMessage).css('color', 'green');
          $("#appbtn").removeAttr("disabled", "");
        } else {
          status.text(option.invalidMessage).css('color', 'red');
          $("#appbtn").attr("disabled", "");
        }
        return;
      }
    });
  }
})(jQuery);