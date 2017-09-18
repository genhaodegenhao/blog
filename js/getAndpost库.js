function ajax(method,url,postbody,successCallback,errorCallback){
//先创建对象
	if (window.XMLHttpRequest) {
		var request = new XMLHttpRequest();
	} else{
		var request = new ActiveXObject();
	}

//创建请求
	if (method == 'get' && postbody) {
		url += '?' + postbody;
	}
	request.open(method,url,true);
	
	if (method == 'get') {
		request.send();
	} else{
		request.setRequestHeader('content-type','application/x-www-form-urlencoded');
		request.send(postbody);
	}
	
//捕获请求状态
	request.onreadystatechange = function(){
		if (request.readyState == 4 && request.status == 200) {
			if (successCallback) {
				successCallback(request.responseText);
			}
		}else if(request.readyState == 4 && request.status != 200){
			if (errorCallback) {
				errorCallback(request.statusText);
			}
		}
	}	
}
