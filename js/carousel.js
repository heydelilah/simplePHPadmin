(function() {

	// 旋转木马

	// 配置
	// 每个木马停留的时间
	var stayTime = 5000;
	// 木马间转换所需要的时间
	var turningTime = 500;

	var titleElms = $('.titles .carousel div');
	var titlesLen = titleElms.length;
	var currentIndex = 0;
	var i, len;
	for (i = 0, len = titlesLen; i < len; i++) {
		var btn = $('<span data-index="' + i + '"></span>')
		$('.titles .buttons').append(btn);
	}
	var buttonElms = $('.titles .buttons span');

	// 激活第index个titile
	var activeBtn = function(index) {
		index = +index >= titlesLen ? 0 : +index;
		var dir = index - currentIndex;
		// 相等时什么都不做直接返回
		if (dir === 0) return;

		// direction为1时向右，-1时向左
		var direction = (dir > 0 ? 1 : -1);

		// 激活第index个按钮，并将原本激活的取消
		buttonElms.eq(index).addClass('act');
		buttonElms.eq(currentIndex).removeClass('act');

		// 标题文字
		var nextTitle = titleElms.eq(index);
		var currentTitle = titleElms.eq(currentIndex);
		// 设置next的位置
		nextTitle.addClass('next');
		nextPosition = direction > 0 ? '100%' : '-100%';
		nextTitle.css({
			left: nextPosition
		})

		// 当前的title向左移动
		currentTitle.animate({
			left: direction > 0 ? '-100%' : '100%'
		}, turningTime);
		// 下一个title向左移动
		nextTitle.animate({
			'left': 0
		}, turningTime, function() {
			// next设为act，去掉current的act属性
			nextTitle.addClass('act').removeClass('next');
			currentTitle.removeClass('act')
			// 记录当前的index
			currentIndex = index;
		});

	}

	// 按钮事件
	buttonElms.on('click', function(ev) {
		var index = $(this).attr('data-index');
		activeBtn(index);
	});

	// 初始化方法
	var init = function() {
		// 设置当前显示的title
		titleElms.eq(0).addClass('act');
		buttonElms.eq(0).addClass('act');

		// 开始计时器
		window.setInterval(function() {
			var next = currentIndex + 1;
			activeBtn(next);
		}, stayTime)
	}

	init();
})();
