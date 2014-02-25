from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/main/')),
    (ur'^account/', include('account.urls')),
    (ur'^main/', 'main.views.home'),
    (ur'^people/', include('people.urls')),
    (ur'^about/', include('about.urls')),
    (ur'^activities/', include('activities.urls')),
    (ur'^recruiting/', include('recruiting.urls')),
    (ur'^media/(?P<path>.*)$', 'django.views.static.serve', {'document_root': './media'}),
    (ur'^admin/', include(admin.site.urls)),
)
