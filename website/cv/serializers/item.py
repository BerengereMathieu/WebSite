from rest_framework.serializers import Serializer
from rest_framework.serializers import CharField
from rest_framework.serializers import ImageField
from website.cv.serializers.tag import TagSerializer


class ItemSerializer(Serializer):
    """
    Item serializer
    """

    title = CharField(required=True)
    description = CharField(required=False, allow_blank=True, \
                            style={'base_template': 'textarea.html'})
    image = ImageField(required=False)
    tags = TagSerializer(read_only=True, many=True)

    def create(self, validated_data):
        pass

    def update(self, instance, validated_data):
        pass
