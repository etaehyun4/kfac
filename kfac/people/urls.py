from django.conf.urls import patterns, include, url

urlpatterns = patterns('',
    (ur'^$', 'people.views.view'),
    (ur'^init/$', 'people.views.getList'),
    (ur'^profile/$', 'people.views.profile'),
)
