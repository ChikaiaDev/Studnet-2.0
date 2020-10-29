var keystone = require('keystone');

exports = module.exports = function(req, res){
  var view = new keystone.View(req, res);
  var locals = res.locals;

  locals.section = 'upscjob';
  locals.filters = {
    upscjob: req.params.upscjob
  }
  locals.data = {
    upscjobs:[]
  }
  //load jobs
  view.on('init', function(next){
    var q = keystone.list('Upscjob').model.findOne({
      slug: locals.filters.upscjob
    });

    q.exec(function(err, result){
      locals.data.upscjob = result;
      next(err);
    });
  });
  //Render view
  view.render('upscjob');
}
