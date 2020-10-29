var keystone = require('keystone');
var Types = keystone.Field.Types;

var Govtjob = new keystone.List('Govtjob',{
  map: {name:'title'},
  singular: 'Govtjob',
  plural:'Govtjobs',
  autokey: {path: 'slug', from: 'title', unique: true}
});

Govtjob.add({

  title: {type: String, required: true},
  state:{type: String},
  departmentName: {type: String},
  publishedDate: {type: String},
  lastDate: {type: String },
  downloadHallticketDate:{type: String},
  examDate: {type: String},
  qualification: {type: String},
  ageLimit: {type: String},
  selectionProcess:{type: String},
  applicationFee:{type: String},
  applicationLink:{type: String},
  totalPost: {type: Number},
  howToApply:{type: String},
  image: { type: Types.CloudinaryImage },
  aboutJob: { type: Types.Html, wysiwyg: true, height: 150 },
  instructionsHowToApply: { type: Types.Html, wysiwyg: true, height: 400 },
});

Govtjob.register();
