from django.conf.urls import url
from cv import views

urlpatterns = [
    url(r'^cv/$', views.cv_item_list),
]