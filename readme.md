# API DOCUMENTATION

##### visit demo(dashboard login): ig_service.luxodev.com

### Tags Example
###### api/medias?tag=Fill_your_tags_here
##### This api used to search in ig_Service using the tags that already added in the system's database
* example: ig_service.luxodev.com/api/medias?key=xxxxxx&tag=davidishandsome

======
### Max/limit
###### api/medias?max=YOUR_NUMBER_LIMIT
##### This api used to limit the result output by specific number.
* example: ig_service.luxodev.com/api/medias?key=xxxxxx&max=10

======
### Exclude_list

###### api/medias?exclude_list=Fill_NAMe_Of_list_excluded

##### This api used to remove selected list of name(s) content from the result, to access it, just fill in the group name of excluded list name(s):

* example: ig_service.luxodev.com/api/medias?key=xxxxxx&exclude_list=negativethinkers
* Note: 
⋅⋅* I already have a list fill with names of people in "negativethinkers"
⋅⋅* API will run through all the list names in the negativethinkers and match it with the result of query.
⋅⋅⋅* If the result contain a content from a name(s) in negative thinker that content will not be showed.

======
### Max Date
###### api/medias?maxdate=Filldateformat(Y-m-d)
##### This api used to limit maximum date of the content result
* example: ig_service.luxodev.com/api/medias?key=xxxxxx&maxDate=2017-11-24

======
### min date
###### api/medias?mindate=Filldateformat(Y-m-d)
##### This api used to limit the minimum date of the content result
* example: ig_service.luxodev.com/api/medias?key=xxxxxx&minDate=2012-11-24


======
### Sort by
###### api/medias?sort=YOUR_SORT_BY_TABLENAME
##### This api used to sort the result by input parameter in descending order(biggest to smallest)
* example: ig_service.luxodev.com/api/medias?key=xxxxxx&sort=likes
* Available sort method: 
⋅⋅* likes
⋅⋅* username
⋅⋅* location
⋅⋅* date
* NOT case sensitive, exact match. ex:
⋅⋅* sort by "like" (the correct one is "likes") will result: not found sort by method
⋅⋅* sort by "LiKeS" will return the same result as sort by "likes" result

======

