angular.module('models.categories', [])
    .service('CategoriesModel', function($http) {
        var model = this;

        model.getCategories = function ()
        {
            return $http.get('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Categories');
        }
    });
