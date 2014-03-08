var people = {
	initialize:function(){
		this.info=$('.member_information');
		this.info.css({'background':'url("/media/image/people/clickphoto.png")', 'background-repeat':'no-repeat', 'background-position': 'center'});
		this.infocall = 0;
		this.showMembers();
	},
	layout:function(){
		var member_profile = $($('<div>', {'class':'.member_profile'})[0]);
		if(member_profile.height())
			$('.member_information').css({'height':member_profile.height()});

		$('#header').css({'height':$('#container').height()});
	},
	showProfile:function(data){	
		people.info.empty();
		if(people.infocall == 0)
		{
			people.infocall = 1;
			people.info.css({'background':'none'});
			people.info.css({'border':'none'});
		}
		people.info.empty();
		$.ajax({
			type: 'POST',
			url: '/people/profile/',
			dataType: 'json',
			data: {'id': data.data.id},
			success: $.proxy(function(all) {
				var info = people.info;
				var profile = $('<div>', {'class': 'member_profile'});
				var frame = $('<div>', {'class': 'profile_frame'});
				var pic = $('<img>', {'class':'profile_picture', 'src':data.data.picture});

				pic.appendTo(frame)
				frame.appendTo(profile)

				var text = $('<div>', {'class': 'profile_text'})
				var profile_intro = $('<div>', {'class':'profile_intro'});
				$('<div>', {'class': 'profile_name'}).text(data.data.kor_name+"("+data.data.eng_name+")").appendTo(profile_intro);
				$('<div>', {'class': 'profile_pos'}).text(data.data.position).appendTo(profile_intro);
				
				profile_intro.appendTo(text);

				var edu = $('<div>', {'class': 'profile_edu'});
				$('<div>', {'class': 'profile_exp_title'}).text("· Education").appendTo(edu);
				for(var i=0;i<all["edu"].length;i++)
				{
					var item = all["edu"][i];
					var e = $('<div>', {'class': 'profile_e'});

					var cell;
					cell = $('<div>', {'class': 'profile_cell'});
					$('<div>', {'class':'profile_date'}).text(item['start']+" - "+item['end']).appendTo(cell);
					cell.appendTo(e);

					cell = $('<div>', {'class': 'profile_cell'});
					$('<div>', {'class':'profile_content'}).text(item['text']).appendTo(cell);
					cell.appendTo(e);

					e.appendTo(edu);
				}
				edu.appendTo(text);

				var work = $('<div>', {'class': 'profile_work'});
				$('<div>', {'class': 'profile_exp_title'}).text("· Work Experience").appendTo(work);
				for(var i=0;i<all["work"].length;i++)
				{
					var item = all["work"][i];
					var w = $('<div>', {'class': 'profile_w'});

					var cell;
					cell = $('<div>', {'class': 'profile_cell'});
					$('<div>', {'class':'profile_date'}).text(item['start']+" - "+item['end']).appendTo(cell);
					cell.appendTo(w);

					cell = $('<div>', {'class': 'profile_cell'});
					$('<div>', {'class':'profile_content'}).text(item['text']).appendTo(cell);
					cell.appendTo(w);

					w.appendTo(work);
				}
				work.appendTo(text);

				text.appendTo(profile);
				profile.appendTo(info);
				people.layout();
			}, this)
		});
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
					var title = $('<div>', {'class':'generation_title'});

					var img = $('<img>', {'class':'people_image', 'src':'/media/image/people/sub03_01.png'});
					if(i==0)
						title.css({'margin-top':'0px'});

					img.appendTo(title);

					var generation_name = $('<div>', {'class': 'generation_name'});
					generation_name.text(generation['word']);
					generation_name.appendTo(title);

					generation_name = $('<div>', {'class': 'generation_name'});
					generation_name.css({'font-size':'3px', 'margin-right':'5px'});
					generation_name.text(generation['order']);
					generation_name.appendTo(title);
					
					generation_name = $('<div>', {'class': 'generation_name'}).text("Generation");
					generation_name.appendTo(title);

					var title_image = $('<img>', {'class':'member_title', 'src':'/media/image/people/member_title.jpg'});
					title_image.appendTo(title);

					title.appendTo(list);
					generation = $('<div>', {'class':'generation'});

					for(var j=0;j<all[i]['member'].length;j++)
					{
						var div = $('<div>', {'class': 'member'});
						var member = all[i]['member'][j];
						var cell;
					    cell = $('<div>', {'class':'table_cell'});
						var pic = $('<img>', {'class':'member_picture', 'src':member['picture']});
						pic.bind('click', {'id': member['id'], 'picture': member['picture'], 'kor_name': member['kor_name'], 'eng_name':member['eng_name'], 'position':member['position']}, this.showProfile);
						pic.appendTo(div);
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
				people.layout();
			}, this)
		});
	},
};
