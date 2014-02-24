from django.db import models
from django.contrib import admin

# Create your models here.
class Member(models.Model):
    generation = models.IntegerField()
    picture = models.ImageField(upload_to = 'profiles/', default = '')
    kor_name = models.CharField(max_length = 10)
    eng_name = models.CharField(max_length = 50)
    position = models.CharField(max_length = 100)
    major = models.CharField(max_length = 30)
    status = models.CharField(max_length = 100)
    def __unicode__(self):
        return self.kor_name

class Education(models.Model):
    user = models.ForeignKey(Member)
    start = models.DateField()
    end = models.DateField()
    to_present = models.BooleanField() # ~present
    text = models.CharField(max_length = 100)

class Work(models.Model):
    user = models.ForeignKey(Member)
    start = models.DateField()
    end = models.DateField()
    to_present = models.BooleanField() #~present
    text = models.CharField(max_length = 100)

class MemberAdmin(admin.ModelAdmin):
    list_display = ('generation', 'kor_name', 'eng_name', 'position', 'major', 'status')

class EducationAdmin(admin.ModelAdmin):
    list_display = ('user', 'start', 'end', 'to_present', 'text')

class WorkAdmin(admin.ModelAdmin):
    list_display = ('user', 'start', 'end', 'to_present', 'text')

admin.site.register(Member, MemberAdmin)
admin.site.register(Education, EducationAdmin)
admin.site.register(Work, WorkAdmin)

