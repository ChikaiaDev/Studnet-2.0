/**
 * This file is where you define your application routes and controllers.
 *
 * Start by including the middleware you want to run for every request;
 * you can attach middleware to the pre('routes') and pre('render') events.
 *
 * For simplicity, the default setup for route controllers is for each to be
 * in its own file, and we import all the files in the /routes/views directory.
 *
 * Each of these files is a route controller, and is responsible for all the
 * processing that needs to happen for the route (e.g. loading data, handling
 * form submissions, rendering the view template, etc).
 *
 * Bind each route pattern your application should respond to in the function
 * that is exported from this module, following the examples below.
 *
 * See the Express application routing documentation for more information:
 * http://expressjs.com/api.html#app.VERB
 */

var keystone = require('keystone');
var middleware = require('./middleware');
var importRoutes = keystone.importer(__dirname);

// Common Middleware
keystone.pre('routes', middleware.initLocals);
keystone.pre('render', middleware.flashMessages);

// Import Route Controllers
var routes = {
	views: importRoutes('./views'),
};

// Setup Route Bindings
exports = module.exports = function (app) {
	// Views
	app.get('/', routes.views.index);
  
	app.get('/engineeringjobs/:category?', routes.views.engineeringjobs);
	app.get('/engineeringjobs/post/:post', routes.views.post);
	app.get('/bankjobs', routes.views.bankjobs);
	app.get('/bankjobs/:bankjob', routes.views.bankjob);
	// railway jobs
	app.get('/railwayjobs', routes.views.railwayjobs);
	app.get('/railwayjobs/:railwayjob', routes.views.railwayjob);
	//Upsc Jobs
	app.get('/upscjobs', routes.views.upscjobs);
	app.get('/upscjobs/:upscjob', routes.views.upscjob);
	//Govt Jobs
	app.get('/govtjobs', routes.views.govtjobs);
	app.get('/govtjobs/:govtjob', routes.views.govtjob);
	  
	// IT jobs
	app.get('/itjobs', routes.views.itjobs);
	app.get('/itjobs/:itjob', routes.views.itjob);

  
	app.all('/contact', routes.views.contact);




};
