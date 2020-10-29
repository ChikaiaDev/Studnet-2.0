var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'upscjob';
  //load jobs
  view.query('upscjobs', keystone.list('Upscjob').model.find());
  //Render view
  view.render('upscjobs');
}
