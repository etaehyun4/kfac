from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    (ur'^login/$', 'account.views._login'),
    (ur'^login_window/$', 'account.views._login_window'),
    (ur'^join/$', 'account.views.join'),
    (ur'^join_form/$', 'account.views.join_form'),
)
