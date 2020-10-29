var keystone = require('keystone');
var Types = keystone.Field.Types;

var Bankjob = new keystone.List('Bankjob',{
  map: {name:'title'},
  singular: 'Bankjob',
  plural:'Bankjobs',
  autokey: {path: 'slug', from: 'title', unique: true}
});

Bankjob.add({

  title: {type: String, required: true},
  bankName: {type: String},
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

Bankjob.register();
