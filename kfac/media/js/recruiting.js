var faq = {
	initialize:function(){
		this.makelist();
	},
	makelist:function(){
		$.ajax({
			type: 'POST',
			url: '/recruiting/faq_list/',
			dataType: 'json',
			success: $.proxy(function(all){
				var list = $('.faq_list');
				for(var i=0;i<all.length;i++)
				{
					var q = all[i];
					var line = $('<div>', {'class':'question'});
					
					var col;
				   	col = $('<div>', {'class':'question_col'});
					var id = $('<div>', {'class':'question_id'});
					id.text(q['id']);
					id.appendTo(col);
					col.appendTo(line);
					
				   	col = $('<div>', {'class':'question_col'});
					var text = $('<div>', {'class':'question_text'});
					var question = $('<div>', {'class':'question_text_q'});
					question.text(q['question']);

					question.bind('click', {'id': q['id'], 'length':all.length}, this.clickQuestion);

					question.hover(function(){
						$(this).css("text-decoration", "underline");
					}, function(){
						$(this).css("text-decoration", "none");
					}
					);
					question.appendTo(text);
					text.appendTo(col);
					col.appendTo(line);

				   	col = $('<div>', {'class':'question_col'});
					var writer = $('<div>', {'class':'question_writer'});
					writer.text(q['writer']);
					writer.appendTo(col);
					col.appendTo(line);

				   	col = $('<div>', {'class':'question_col'});
					var date = $('<div>', {'class':'question_date'});
					date.text(q['date']);
					date.appendTo(col);
					col.appendTo(line);

				   	col = $('<div>', {'class':'question_col'});
					var click = $('<div>', {'class':'question_click'});
					click.text(q['click']);
					click.appendTo(col);
					col.appendTo(line);

					line.appendTo(list);

					var answer = $('<div>', {'class':'question_answer'});
					answer.text(q['answer']);
					answer.css({'display':'none'});
					answer.appendTo(list);
					$('<div>', {'class':'question_line'}).appendTo(list);
				}
			}, this)
		});
	},
	clickQuestion:function(data){
		var x = data.data.length-data.data.id;
		for(var i=0;i<data.data.length;i++)
		{
			if(i==x)
			{
				if($($('.question_answer')[i]).css("display") == "none")
				{
					console.log($($('.question_answer')[i]).css("display"));
					$.ajax({
						type: 'POST',
						url:'/recruiting/update_click/',
						dataType: 'json',
						data: {'id':data.data.id},
						success: $.proxy(function(data){
							$($('.question_click')[x]).text(data['click']);
						}, this)
					});
				}
				$($('.question_answer')[i]).css({'display':'block'});
			}
			else
			{
				$($('.question_answer')[i]).css({'display':'none'});
			}
		}
	},
};
