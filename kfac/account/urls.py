from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    (ur'^login/$', 'account.views._login'),
)
