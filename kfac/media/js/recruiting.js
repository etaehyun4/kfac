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
					text.text(q['question']);
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
					$('<div>', {'class':'question_line'}).appendTo(list);
				}
			}, this)
		});
	},
};
