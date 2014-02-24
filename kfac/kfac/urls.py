from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/main/')),
    (ur'^account/', include('account.urls')),
<<<<<<< HEAD
    (ur'^media/(?P<path>.*)$', 'django.views.static.serve', {'document_root': './media'}),
=======
    (ur'^admin/', include(admin.site.urls)),
>>>>>>> 0e7e5c00cc91818c207e471baa6a859a7fcb178d
)
