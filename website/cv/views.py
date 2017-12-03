from django.http import JsonResponse
from cv.models.item import Item
from cv.serializers.item import ItemSerializer

def cv_item_list(request):
    """
    List all projects.
    """
    if request.method == 'GET':
        projects = Item.objects.all()
        serializer = ItemSerializer(projects, many=True)
        return JsonResponse(serializer.data, safe=False)