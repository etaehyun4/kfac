from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    (ur'^login/$', 'account.views._login'),
    (ur'^login_window/$', 'account.views._login_window'),
    (ur'^logout/$', 'account.views._logout'),
    (ur'^join/$', 'account.views.join'),
    (ur'^join/id_check/$', 'account.views.join_id_check'),
    (ur'^join_form/$', 'account.views.join_form'),
    (ur'^join_success/$', 'account.views.join_success'),
    (ur'^my_info/$', 'account.views.mypage'),
    (ur'^my_info/password_check/$', 'account.views.password_check'),
)
