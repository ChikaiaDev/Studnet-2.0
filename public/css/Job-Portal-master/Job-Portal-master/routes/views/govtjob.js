var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'govtjob';
  locals.filters = {
    govtjob: req.params.govtjob
  }
  locals.data = {
    govtjobs:[]
  }
  //load jobs
  view.on('init', function(next){
    var q = keystone.list('Govtjob').model.findOne({
      slug: locals.filters.govtjob
    });

    q.exec(function(err, result){
      locals.data.govtjob = result;
      next(err);
    });
  });
  //Render view
  view.render('govtjob');
}
