$.fn.serializeObject = function() {
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if(o[this.name] !== undefined) {
			if(!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};
$.fn.unSerializeObject = function(json) {
	var jsonObj = JSON.parse(json);
	for(obj in jsonObj) {
		if(obj != "_method") {
			if(typeof(jsonObj[obj])=="object"){
				$("[name='" + obj + "']").each(function(i){
					$(this).val(jsonObj[obj][i]);
				});
			} else {
				$("[name='" + obj + "']").val((jsonObj[obj]));
			}
		}
	}
}
function updateAutoSave() {
	var autoSaveDiv = $("<div id='autoSaveDiv' style='position:fixed; top:0; left: 50%; background: #333; color: #FFF; padding: 10px; border-radius: 0 0 6px 6px;'>Auto Saving ..... </div>");
	$("body").append(autoSaveDiv);
	localStorage.setItem(window.location.pathname, JSON.stringify($("form").serializeObject()));
	setInterval(function() {
		autoSaveDiv.detach();
	}, 1000);
}

//var pageFrmAutoSave = setInterval("updateAutoSave()", 10000);
//$(function() {
//	if(localStorage.getItem(window.location.pathname) != null) {
//		if(confirm("Do you want to reterive the unsaved values!!")) {
//			$("form").unSerializeObject(localStorage.getItem(window.location.pathname));
//			//localStorage.removeItem(window.location.pathname);
//		} else {
//			localStorage.removeItem('dw-vms-vendor-addNew');
//		}
//	}
//});
