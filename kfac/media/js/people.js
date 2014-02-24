var people = {
	initialize:function(){
		var member_info=$('.member_info');
		member_info.css({'background':'url("/media/image/people/clickphoto.png")', 'background-repeat':'no-repeat', 'background-position': 'center'});
		this.showMembers();
	},
	showMembers:function(){
		var list=$('.member_list');
		$.ajax({
			type: 'POST',
			url: '/people/init/',
			dataType: 'json',
			success: $.proxy(function(all) {
				for(var i=0;i<all.length;i++)
				{
					var generation = all[i];
					var generation_name = $('<div>', {'class': 'generation_name'});
					generation_name.text(generation['word']+" generation");
					generation_name.appendTo(list);

					generation = $('<div>', {'class':'generation'});

					for(var j=0;j<all[i]['member'].length;j++)
					{
						var div = $('<div>', {'class': 'member'});
						var member = all[i]['member'][j];
						var cell;
					    cell = $('<div>', {'class':'table_cell'});
						$('<img>', {'class':'member_picture', 'src':member['picture']}).appendTo(cell);
						$('<div>', {'class':'member_name'}).text(member['kor_name']+'('+member['eng_name']+')').appendTo(cell);
						cell.appendTo(div);

						cell = $('<div>', {'class':'table_cell'});
						$('<div>', {'class':'member_major'}).text(member['major']).appendTo(cell);
						cell.appendTo(div);

						cell = $('<div>', {'class':'table_cell'});
						$('<div>', {'class':'member_status'}).text(member['status']).appendTo(cell);
						cell.appendTo(div);
						
						div.appendTo(generation);

						$('<div>', {'class':'member_line'}).appendTo(generation);
					}
					generation.appendTo(list);	
				}
			}, this)
		});
	},
};
