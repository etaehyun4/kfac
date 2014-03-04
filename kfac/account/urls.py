from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    (ur'^login/$', 'account.views._login'),
    (ur'^login_window/$', 'account.views._login_window'),
    (ur'^logout/$', 'account.views._logout'),
    (ur'^join/$', 'account.views.join'),
    (ur'^join_form/$', 'account.views.join_form'),
    (ur'^join_success/$', 'account.views.join_success'),
    (ur'^my_info/$', 'account.views.mypage'),
    (ur'^id_password_lost/$', 'account.views.id_password_lost'),
    (ur'^find_password/$', 'account.views.find_password'),
    (ur'^id_check/$', 'account.views.id_check'),
    (ur'^password_check/$', 'account.views.password_check'),
    (ur'^name_email_check/$', 'account.views.name_email_check'),
)
