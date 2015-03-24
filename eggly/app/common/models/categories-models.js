angular.module('models.categories', [])
    .service('CategoriesModel', function($http, $q) {
        var model = this;
        var categories;
        var currentCategory;

        function findCategory(categoryName)
        {
            for(var i=0; i<categories.length; i++)
            {
                if(categories[i].name == categoryName)
                {
                    return categories[i];
                }
            }
        }

        model.getCategories = function ()
        {
            var deferred = $q.defer();

            if(categories)
            {
                deferred.resolve(categories);
            }
            else
            {
                $http.get('http://localhost/Project3WA/EgglyAPIAngular/CodeIgniter3/index.php/Categories')
                    .then(function(results)
                    {
                        categories = results.data;
                        deferred.resolve(categories);
                    })
            }
            /*
             return $http.get('http://localhost/egglyapi/index.php/Categories');
             */
            return deferred.promise;
        };

        model.getCurrentCategoryName = function()
        {
            if (currentCategory)
            {
                return currentCategory.name;
            }
            else
            {
                return '';
            }

            // equivalent en ternaire :
            // return currentCategory ? currentCategory.name : "";
        };

        model.getCurrentCategory = function()
        {
            return currentCategory;
        };

        model.setCurrentCategory = function(categoryName)
        {
            model.getCategoryByName(categoryName)
                .then(function(category)
                {
                    currentCategory = category;
                })
        };


        model.getCategoryByName = function(categoryName)
        {
            var deferred = $q.defer();
            if(categories)
            {
                deferred.resolve(findCategory(categoryName));

            }
            else
            {
                model.getCategories()
                    .then(function()
                    {
                        deferred.resolve(findCategory(categoryName));
                    })
            }
            return deferred.promise;
        };
    });
