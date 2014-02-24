from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/main/')),
    (ur'^account/', include('account.urls')),
    (ur'^main/', 'main.views.home'),
    (ur'^admin/', include(admin.site.urls)),
)
