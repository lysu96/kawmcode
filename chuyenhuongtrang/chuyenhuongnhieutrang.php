<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript">
		var time = 5; //How long (in seconds) to countdown
		var time2 = 3;
		var arr = [];
		var urlLoad = "";
		var myWindow;
		var demSlarrgoogle = 0;
		var demSlarryoutube = 0;
		var demSlarrhmooblee = 0;

		//The page to redirect to
		var page ={
			"nameWebsite":'',
			"url":[
			'https://www.google.com/',
			'https://hmooblee.co/',
			'https://www.youtube.com/',
			]
		};

		function countDown(){
			time--;
			gett("container").innerHTML = time;

			if(time == 0){
				
				// lấy ngẫu nhiêm một giá trị trong mạng.
				Array.prototype.randomElement = function () {
					return this[Math.floor(Math.random() * this.length)];
				}
				var myUrl = page.url.randomElement();

				gett("container").innerHTML = myUrl;
				time = 3+2;

				// kiểm tra chỉ lưu một giá trị chưa tồn tại.
				let ans = deduplicate(arr);
				function deduplicate(arr) {
					let isExist = (arr, x) => arr.indexOf(x) > -1;
					let ans = [];

					arr.forEach(element => {
						if(!isExist(ans, element)) ans.push(element);
					});
					return ans;
				}
				// lưu tất cả giá trị.
				arr.push(myUrl);

				// check số lượng mạng đã lưu
				var checkArr = arr.randomElement();
				if (checkArr == "https://www.google.com/") {
					urlLoad = checkArr;
					demSlarrgoogle++;
					//openInNewTab(urlLoad);
					if (openWin(urlLoad)) {
						time2--;
						if (time2 == 0) {
							closeWin();
							time = 5;
						}
					}

				}else if (checkArr == "https://www.youtube.com/") {
					//window.location.href = checkArr;
					urlLoad = checkArr;
					demSlarryoutube++;
				}else {
					urlLoad = checkArr;
					demSlarrhmooblee++;
				} 
				
				gett("Slgl").innerHTML =  demSlarrgoogle;
				gett("Slyt").innerHTML =  demSlarryoutube;
				gett("Slhl").innerHTML =  demSlarrhmooblee;
				gett("arrnew").innerHTML =  ans;
				gett("arrPush").innerHTML =  arr;

				// function openInNewTab(url) {
				// 	var win = window.open(url, '_blank');
				// 	win.focus();
				// }
				$('#myButton').click(function () {
					var redirectWindow = window.open('http://google.com', '_blank');
					redirectWindow.location;
				});

				function openWin(url) {
					myWindow = window.open(url, "_blank", "width=500, height=500");
				}

				function closeWin() {
					myWindow.close();
				}

			}
		}


// 		//Google
// 		if(config.search_google == 'yes'){
// 			flagRundom = false;
// 			var checkSearch  = getUrlParameter('q');
// 			if(checkSearch == undefined){
// 				var check = random_item([1,2,1]);
// 				if(check == 1){
// 					autoSearchData('google');
// 				}else{
// 					autoRedrectRandomLink();
// 				}
// 			}else{
// 				setTimeout(function(){
// 					var sTitle = $('input.gLFyf').val();
// 					if(sTitle == undefined){sTitle = $('.tsf-p #lst-ib').val();}
// 					if(sTitle == undefined){sTitle = $('.wQnou input.JSAgYe').val();}
// 					if(sTitle == undefined){sTitle = $('input#lst-ib').val();}
// 					if(sTitle == undefined){
// 						var aTitle = document.title.split(' - ');
// 						sTitle = aTitle[0];
// 					}

// 					if (sTitle == undefined || sTitle == '') {
// 						window.location.href = 'https://' + sGo + '/';
// 					}

// 					var sVideoID = '';
// 					if(sTitle != '' && sTitle != undefined) {
// 						if(config.data != '') {
// 							$.each(config.data, function (key, val) {
// 								if(val.videoTitle == sTitle) {
// 									sVideoID = val.videoID;
// 								}
// 							});
// 						}

// 						if(sVideoID != ''){
// 							autoScrollBrowser();

// 							$('p.extension-show-info').remove();
// 							var sHtml = '<p class="extension-show-info">Đang tìm Video có ID: ' + sVideoID +'</p>';
// 							$(sHtml).appendTo('body');

// 							setTimeout(function(){
// 								var flag = false;

//                                     //Tab Tất Cả
//                                     if($(".y8AWGd a").length){
//                                     	$(".y8AWGd a").each(function(index, value) {
//                                     		var idVideoGet = youtube_parser($(this).attr('href'));
//                                     		if(idVideoGet != false && idVideoGet == sVideoID){
//                                     			flag = true;
//                                     			$(this)[0].click();
//                                     			return;
//                                     		}
//                                     	});
//                                     }

//                                     //Tab Video
//                                     if($(".yuRUbf > a").length){
//                                     	$(".yuRUbf > a").each(function(index, value) {
//                                     		var idVideoGet = youtube_parser($(this).attr('href'));
//                                     		if(idVideoGet != false && idVideoGet == sVideoID){
//                                     			flag = true;
//                                     			$(this)[0].click();
//                                     			return;
//                                     		}
//                                     	});
//                                     }

//                                     if($("#rso .rc .r > a").length){
//                                     	$("#rso .rc .r > a").each(function(index, value) {
//                                     		var idVideoGet = youtube_parser($(this).attr('href'));
//                                     		if(idVideoGet != false && idVideoGet == sVideoID){
//                                     			flag = true;
//                                     			$(this)[0].click();
//                                     			return;
//                                     		}
//                                     	});
//                                     }

//                                     setTimeout(function(){
//                                     	if(flag == false){
//                                             //Tab Not Tab Hinh Anh
//                                             if($("#hdtb-msb-vis .hdtb-mitem.hdtb-msel").length){
//                                                 //Chuyen Tab
//                                                 if($("#hdtb-msb-vis .hdtb-mitem.hdtb-msel").next().find('a').attr('href') == undefined){
//                                                 	window.location.href = 'https://'+sGo+'/';
//                                                 }else{
//                                                 	$("#hdtb-msb-vis .hdtb-mitem.hdtb-msel").next().find('a')[0].click();
//                                                 }
//                                             }

//                                             //Tab Hinh Anh
//                                             if($(".T47uwc .NZmxZe").length){
//                                             	$(".T47uwc .rQEFy.NZmxZe").next()[0].click();
//                                             }

//                                             setTimeout(function(){
//                                             	window.location.href = 'https://'+sGo+'/';
//                                             }, 5000);
//                                         }
//                                     }, 2500);
//                                 }, randomIntFromRange(8000, 15000));
// 						}else{
// 							window.location.href = 'https://'+sGo+'/';
// 						}
// 					}
// 				}, 1500);
// }
// }


function datas(item, index) {
	gett("arrnew").innerHTML = arr.item + ":" + arr.index;
}


function gett(id){
	if(document.getElementById) return document.getElementById(id);
	if(document.all) return document.all.id;
	if(document.layers) return document.layers.id;
	if(window.opera) return window.opera.id;
}


function init(){
	if(gett('container')){
		setInterval(countDown, 1000);
		gett("container").innerHTML = time;
	}
	else{
		setTimeout(init, 50);
	}
}
document.onload = init();
</script>

</head>
<body>
	<h2>Chuẩn bị để được chuyển hướng sau <span id="container"></span> giây!</h2>
	<span id="arrnew"></span>
	<p>Số lần xuất hiện google: <span id="Slgl"></span></p>
	<p>Số lần xuất hiện youtube: <span id="Slyt"></span></p>
	<p>Số lần xuất hiện hmooblee: <span id="Slhl"></span></p>
	<span id="arrPush"></span>
	<button id="myButton">Tab</button>
</body>
</html>