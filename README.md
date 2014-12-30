> **IMPORTANT NOTE** - This is currently a work in progress.  

> Only a handful of Elasticsearch routes are currently documented.

> Tested with PHP `5.6.3`.

##swagger-es

**This PHP script creates a [Swagger 2.0](http://swagger.io/) JSON file based upon the contents of your Elasticsearch instance at a point in time.**

It is assumed you already have [swagger-ui](https://github.com/swagger-api/swagger-ui) installed and running.

Since the documentation is dynamically created based upon the contents of your Elasticsearch instance, this script will have to be run periodically (or could be setup to run periodically with a cronjob)  

To keep track of when the file was created, we set the Swagger "version" to the current time (ISO_8601 format).

```
{
  "swagger": "2.0",
  "info": {
    "description": "API docs generated for Elasticsearch located at http://localhost:9200",
    "version": "2014-12-30T08:49:09+00:00",
    "title": "Elasticsearch"
  },
  ...
}
```

#### How to use

**1. Clone the repo**

```
$ git clone https://github.com/540co/swagger-es.git
```
	
**2. Change directory and run script defining the URL to your Elasticsearch instance and your desired output file (including path if you want it written to a different location)**
	
```
$ cd swagger-es
	
$ php generate.php [url] [swagger_json_file]
```

**Example**
 
```
$ php generate.php http://localhost:9200 swagger.json
```

**3. Copy the `swagger.json` file (or whatever name you provided) to somewhere that your [swagger-ui](https://github.com/swagger-api/swagger-ui) implementation can see the file and point your swagger-ui docs to the file.**

