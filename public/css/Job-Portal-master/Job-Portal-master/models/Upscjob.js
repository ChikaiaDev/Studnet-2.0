var keystone = require('keystone');
var Types = keystone.Field.Types;

var Upscjob = new keystone.List('Upscjob',{
  map: {name:'title'},
  singular: 'Upscjob',
  plural:'Upscjobs',
  autokey: {path: 'slug', from: 'title', unique: true}
});

Upscjob.add({

  title: {type: String, required: true},
  departmentName: {type: String},
  publishedDate: {type: String},
  lastDate: {type: String },
  downloadHallticketDate:{type: String},
  examDate: {type: String},
  qualification: {type: String},
  ageLimit: {type: String},
  selectionProcess:{type: String},
  applicationFee:{type: String},
  totalPost: {type: Number},
  howToApply:{type: String},
  applicationLink:{type: String},
  image: { type: Types.CloudinaryImage },
  aboutJob: { type: Types.Html, wysiwyg: true, height: 150 },
  instructionsHowToApply: { type: Types.Html, wysiwyg: true, height: 400 },
});

Upscjob.register();
