var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'itjob';
  //load jobs
  view.query('itjobs', keystone.list('Itjob').model.find());
  //Render view
  view.render('itjobs');
}
