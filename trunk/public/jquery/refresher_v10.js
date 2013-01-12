function refresher(session_id, ajax_delay, sideblock_rq_exists, sideblock_quotes_exists, quotes_bar_exists, economicCalendar_exists, smlID) {
	ajax_delay = ajax_delay || 8000;
	$.ajax({
		url:'/common/refresher_new/refresher.php', 
		type: "GET",
		data: "session_uniq_id=" + session_id + "&sideblock_recent_quotes=" + sideblock_rq_exists + "&sideblock_quotes_exists=" + sideblock_quotes_exists + "&quotes_bar_exists=" + quotes_bar_exists + "&economicCalendar_exists=" + economicCalendar_exists + "&smlID=" +smlID,
		dataType: ($.browser.msie) ? "text" : "text",
		success:
	    function(data) {
		if (data.length > 0) {
			try {
				var tables_array_all = JSON.parse(data);
			} catch(e) {
			   setTimeout( function() {
				refresher(session_id, ajax_delay, sideblock_rq_exists, sideblock_quotes_exists, quotes_bar_exists, economicCalendar_exists, smlID);
				}, 15000);
			   return false;
			}
			var h;
			var i;
			var j;
			var ChartObj= {
    				 last: 0,
	     			 change: 0,
	     			 change_percent: 0,
	     			 high: 0,
	     			 low: 0,
	     			 last_step_direction: 0,
	     			 datetime: 0
			};
			for (h in tables_array_all) {
				var tables_array = tables_array_all[h];
				for (i in tables_array) {
					var table_rows_array = tables_array[i];
					for (j in table_rows_array) {
						if (j=='recent' || j=='portfolio' || i=='portfolio_page') var divname='#'+j;
						else var divname = '#'+i+' #pair_' + j;
						var divcontent = table_rows_array[j];
						if (i=='quotesSummary'){
							if (divcontent['type']=='value' && divcontent['id']=='last_last') ChartObj.last=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='last_change_normal') ChartObj.change=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='currency_change_percents') ChartObj.change_percent=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='currency_high') ChartObj.high=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='currency_low') ChartObj.low=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='last_step_direction') ChartObj.last_step_direction=divcontent['data'];
							if (divcontent['type']=='value' && divcontent['id']=='timestamp') ChartObj.datetime=divcontent['data'];
						}
						if (i=='flash_charts'){
							if (divcontent['new_value']==1) {
									var dataObj= {
					     				 last: divcontent['last'],
						     			 change: divcontent['change'],
						     			 change_percent: divcontent['change_percent'],
						     			 high: divcontent['high'],
						     			 low: divcontent['low'],
						     			 last_step_direction: divcontent['last_step_direction'],
						     			 datetime: divcontent['timestamp']
									};
									sendDataToSWF(divcontent['flash_id'], dataObj);
							}
						}
						if (divcontent['type']) {
							switch (divcontent['type'])
							{
								case 'value':
									$('#' + divcontent['id']).html(divcontent['data']);
									break;
								case 'css':
									$('#' + divcontent['id']).removeClass();
									$('#' + divcontent['id']).addClass(divcontent['data']);
									break;
								case 'style':
									$('#' + divcontent['id']).attr('style', divcontent['data']);
									break;
								case 'style_color':
									$('#' + divcontent['id']).css('color', divcontent['data']);
									break;
								case 'ec_bgColor':
									if (divcontent['checkData'] != $('#' + divcontent['checkID']).html())
										$('#' + divcontent['id']).css('background-color', divcontent['data']);
									break;
								case 'flash_chart':
									sendDataToSWF(divcontent['id'], ChartObj);
									break;										
							}
						}
						else {
							$(divname).html(divcontent);
						}
					}
				}
			}
			delete tables_array;
			delete table_rows_array;
			delete h;
			delete i;
			delete j;
			delete divname;
			delete divcontent;
		}
		setTimeout( function() {
			refresher(session_id, ajax_delay, sideblock_rq_exists, sideblock_quotes_exists, quotes_bar_exists, economicCalendar_exists, smlID);

		}, ajax_delay);
	},
	error:
		function(XMLHttpRequest, textStatus, errorThrown)
		{
			setTimeout( function() {
				refresher(session_id, ajax_delay, sideblock_rq_exists, sideblock_quotes_exists, quotes_bar_exists, economicCalendar_exists, smlID);

			}, 15000);
		}
	});
}