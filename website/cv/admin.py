from django.contrib import admin
from .models.tag import Tag
from .models.item import Item

admin.site.register(Tag)


class ItemAdmin(admin.ModelAdmin):
    filter_horizontal = ('tags',)


admin.site.register(Item, ItemAdmin)
