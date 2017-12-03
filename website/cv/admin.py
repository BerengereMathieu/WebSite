from django.contrib import admin
from .models.item import Tag, Item

admin.site.register(Tag)


class ItemAdmin(admin.ModelAdmin):
    filter_horizontal = ('tags',)


admin.site.register(Item, ItemAdmin)
