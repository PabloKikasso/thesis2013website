/** Responsive Blocks 
if($ww > 1200){
								
} else if($ww > 980 && $ww < 1200){
	
} else if($ww > 768 && $ww < 980) {
	
} else {
	
}
**/
$(document).ready(function(){
	
	// Vars
	var scrollPaneOpts = {
		verticalDragMinHeight : 50,
		verticalDragMaxHeight : 100,
		verticalDragMinWidth : 20,
		verticalDragMaxWidth : 20
			
	},	slidejsOpts = {
		
		preload: true,
		preloadImage : './img/preloader.gif',
		container: 'thumbnails',
		generatePagination: false,
		fadeSpeed: 350,
		fadeEasing: "easeOutQuad",
		slideSpeed: 350,
		effect: 'fade',
		play: 2000,
		//bigTarget: true,
		//hoverPause: true,
		generateNextPrev: true
	},
		$window = $(window),
		$wh = $window.height(),
		$ww = $window.width(),
		apis = [],
		isJspCreated = false,
		isMainWinClosed = false,
		isMainWinMinimized = false,
		isMainWinFull = false,
		hasWinSizeChanged = false,
		widths = {
			mainWin1200 : 950,
			mainWin980 : 870,
			mainWin768 : 650	
		};
	
	// Functions	
	function minimizeWin(selector){
		if(!isMainWinMinimized){
			if($ww > 1200){
				$(selector).slideUp(200, function(){
					$('.window').animate({
						left : 1,
						top: 43,
						width: 300
					},200, function(){
						isMainWinMinimized = true;
						console.log('isMainWinMinimized is '+ isMainWinMinimized);
					});
				});				
			} else if($ww > 980 && $ww < 1200){
				$(selector).slideUp(200, function(){
					$('.window').animate({
						left : 1,
						top: 43,
						width: 300
					},200, function(){
						isMainWinMinimized = true;
						console.log('isMainWinMinimized is '+ isMainWinMinimized);
					});
				});
				
			} else if($ww > 768 && $ww < 980) {
				$(selector).slideUp(200, function(){
					$('.window').animate({
						left : 1,
						top: 52,
						width: 300
					},200, function(){
						isMainWinMinimized = true;
						console.log('isMainWinMinimized is '+ isMainWinMinimized);
					});
				});
				
			}
			
		} else {
			if(isMainWinFull){
				$('.window').animate({
					left: 0,
					top: 40,
					width: $ww,	 
				},200, function(){
					$('#sideBar').animate({
						width: (($ww*15)/100)
					}, 100, function(){
						$('.jspContainer,.jspPane,#content').animate({
							width: (($ww*85)/100),
						},100, function(){
							/*
							$('.jspContainer, .jspPane, #content').animate({
								height: $wh-120
							},100);
							*/
							$('#wrapper').slideDown(200, function(){
								isMainWinMinimized = false;
							});
							console.log('isMainWinFull is '+ isMainWinFull);
						});
					});
				});			
			} else {	
				$('.window').animate({
					left: 250,
					top: 70,
					width: widths.mainWin1200	 
				},200, function(){
					$('.jspContainer,.jspPane,#content').animate({
						width: 750
					},100, function(){
						$('#sideBar').animate({
						width: 200
						},20, function(){
							$('#wrapper').slideDown(200, function(){
								isMainWinMinimized = false;
							});	
							console.log('isMainWinFull is '+ isMainWinFull);
						});	
					});	
				});					
			}
		}
	}
	function maximizeWin(){		
		if(!isMainWinFull){
			$('#wrapper').animate({
				opacity: 0
			},100,function(){
				$('.window').animate({
					left: 0,
					top: 40,
					width: $ww,	 
				},200, function(){
					$('#sideBar').animate({
						width: (($ww*15)/100)
					}, 100, function(){
						$('.jspContainer,.jspPane,#content').animate({
							width: (($ww*85)/100),
						},100, function(){
							/*
							$('.jspContainer, .jspPane, #content').animate({
								height: $wh-120
							},100);
							*/
							isMainWinFull = true;
							$('#wrapper').animate({
								opacity : 1
							},100);
						});
					});
				});	
			});
			if(isMainWinMinimized){
				$('#wrapper').slideDown(200);
			}
		} else {
			if($ww > 1200){
				$('#wrapper').animate({
					opacity: 0
				},100,function(){
					$('.window').animate({
						left: 250,
						top: 70,
						width: widths.mainWin1200	 
					},200, function(){
						$('.jspContainer,.jspPane,#content').animate({
							width: 750
						},100, function(){
							$('#sideBar').animate({
							width: 200
							},20, function(){
								isMainWinFull = false;
								$('#wrapper').animate({
									opacity: 1	
								},100);
							});	
						});	
					});	
				});
				
			} else if($ww > 980 && $ww < 1200){
				$('#wrapper').animate({
					opacity: 0
				},100,function(){
					$('.window').animate({
						left: 250,
						top: 70,
						width: widths.mainWin980	 
					},200, function(){
						$('.jspContainer,.jspPane,#content').animate({
							width: 680
						},100, function(){
							$('#sideBar').animate({
							width: 170
							},20, function(){
								isMainWinFull = false;
								$('#wrapper').animate({
									opacity: 1	
								},100);
							});	
						});	
					});	
				});
			} else if($ww > 768 && $ww < 980) {
				$('#wrapper').animate({
					opacity: 0
				},100,function(){
					$('.window').animate({
						left: 100,
						top: 60,
						width: widths.mainWin768	 
					},200, function(){
						$('.jspContainer,.jspPane,#content').animate({
							width: 430
						},100, function(){
							$('#sideBar').animate({
							width: 200
							},20, function(){
								isMainWinFull = false;
								$('#wrapper').animate({
									opacity: 1	
								},100);
							});	
						});	
					});	
				});
			}
			if(isMainWinMinimized){
				$('#wrapper').slideDown(200);
			}
		}
	}
	
	
	// Events
	$('section.preview').slides(slidejsOpts);
	
	$('#mainNavigation li').draggable({
		drag: function(){
			$(this).css({
				zIndex : 100
			});
		}
	});
	
	$('.window').draggable({
		handle : 'header'
	});
	$('#close').click(function(){
		$('.window').fadeOut(200, function(){
			isMainWinClosed = true;
		});
	});
	$('#minimize').click(function(){
		minimizeWin('#wrapper');
		hasWinSizeChanged = true;
	});
	$('#maximize').click(function(){		
		maximizeWin();
		hasWinSizeChanged = true;
	});
	$('#mainNavigation li').click(function(){
		if(isMainWinClosed){
			$('.window').fadeIn(200,function(){ 
				if($('#wrapper').is(':hidden')){
					$('#wrapper').slideDown(200);
				}
			});
		}
	});
	
	if($ww > 767){
		$('#content').each(function(){
			apis.push($(this).jScrollPane(scrollPaneOpts).data().jsp);
			//console.log(apis.length);
		});
		isJspCreated = true;
	}
	$window.resize(function(){
		
		var $window = $(window),
			$wh = $window.height(),
			$ww = $window.width();
		if($ww > 1200 && isMainWinFull == true){
			$('.window').animate({
				left: 250,
				top: 70,
				width: widths.mainWin1200	 
			},200, function(){
				$('.jspContainer,.jspPane,#content').animate({
					width: 750
				},100, function(){
					$('#sideBar').animate({
					width: 200
					},20, function(){
						isMainWinFull = false;	
					});	
				});	
			});
		}
		// Create jScrollPane and destroy it
		if(($ww > 768)){
			$('#content').each(function(){
				apis.push($(this).jScrollPane(scrollPaneOpts).data().jsp);
				//console.log(apis.length);
				isJspCreated = true;
			});
		} else {
			if (apis.length) {
				$.each(apis,function(i) {
						this.destroy();
					}
				)
				apis = [];
				isJspCreated = false;
			}
		}
	
		// responsify the jScrollPane
		if(hasWinSizeChanged){
			if($ww > 1200){
				if(!isMainWinMinimized){
					//console.log('>1200');
					$('.window').css({
						width: 950,
						top: 70,
						left: 250,
						position: 'absolute'
					});
					$('#sideBar').css({
						width: 200
					});
					$('#content, .jspPane, .jspContainer').css({
						width: 749
					});
				}
				
			} else if($ww > 980 && $ww < 1200){
				//console.log('>980 & < 1199');
				if(!isMainWinMinimized){
					$('.window').css({
						width: 870,
						top:70,
						left:100,
						position: 'absolute'
						
					});
					$('#sideBar').css({
						width: 170
					});
					$('#content, .jspPane, .jspContainer').css({
						width: 699
					});
				}
				
			} else if($ww > 768 && $ww < 980) {
				//console.log('>768 & <979');
				if(!isMainWinMinimized){
					$('.window').css({
						width: 650,
						top:50,
						left:100,
						position: 'absolute'
					});
					$('#sideBar').css({
						width: 200
					});
					$('#content, .jspPane, .jspContainer').css({
						width: 449
					});	
				}
				
			} else {
				console.log('small');
				$('.window').css({
					position: 'relative',
					top:70,
					left:0,
					width: '100%'
					
				});
				if(isMainWinMinimized){
					$('#wrapper').slideDown(200);
					isMainWinMinimized = false;
				}
			}	
		}
		
	});
	
	
});