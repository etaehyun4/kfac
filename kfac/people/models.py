from django.db import models
from django.contrib import admin

# Create your models here.
class People(models.Model):
    generation = models.IntegerField()
    picture = models.ImageField(upload_to = 'profiles/', default = '')
    kor_name = models.CharField(max_length = 10)
    eng_name = models.CharField(max_length = 50)
    major = models.CharField(max_length = 30)
    status = models.CharField(max_length = 100)
    def __str__(self):
        return self.kor_name

class Education(models.Model):
    user = models.ForeignKey(People)
    start = models.DateField()
    end = models.DateField()
    to_present = models.BooleanField() # ~present
    text = models.CharField(max_length = 100)

class Work(models.Model):
    user = models.ForeignKey(People)
    start = models.DateField()
    end = models.DateField()
    to_present = models.BooleanField() #~present
    text = models.CharField(max_length = 100)

class PeopleAdmin(admin.ModelAdmin):
    list_display = ('generation', 'kor_name', 'eng_name', 'major', 'status')

class EducationAdmin(admin.ModelAdmin):
    list_display = ('user', 'start', 'end', 'to_present', 'text')

class WorkAdmin(admin.ModelAdmin):
    list_display = ('user', 'start', 'end', 'to_present', 'text')

admin.site.register(People, PeopleAdmin)
admin.site.register(Education, EducationAdmin)
admin.site.register(Work, WorkAdmin)

