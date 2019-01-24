@extends('layouts.master')
@section('title', 'Entrepreneur Details')
@section('pagebody')
<style type="text/css">
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  background-color: white;
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid transparent;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

</style>
<script src="https://js.stripe.com/v3/"></script>
<section class="details-header-bg animated slideInDown">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-5">
                        <div class="thumb_logo"><img src="{{$entrepreneur[0]->logo}}" alt="Testing Women by Acropolis" class="details-logo" id="" ></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h2> {{$entrepreneur[0]->name}} <span class="wpfp-span">
                            <!-- <img src="{{url('/assets_new')}}/img/loading.gif" alt="Loading" title="Loading" class="wpfp-hide wpfp-img" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"> -->
                                <a class="wpfp-link" href="?wpfpaction=add&amp;postid=4768" title="" rel="nofollow">
                                    <button><i class="fa fa-heart" aria-hidden="true"></i></button>
                                </a></span>
                        </h2>
                        <p class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$entrepreneur[0]->city}},{{$entrepreneur[0]->state}},{{$entrepreneur[0]->country}}</p>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="sent-btns"></div>   
                    </div>
                </div>
            </div>
        </section>
        <section class="details-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6 col-sm-8 col-xs-7 col-ns-12">
                        <div>
                            <span>
                                <a href="#">Home</a></span>  / <span><a class="active" href="#">{{$entrepreneur[0]->name}}</a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-5 col-ns-12">
                        <ul></ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Inner Contents -->               
        
        <section class="details-body">
            <div class="container">
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-offset-3 col-md-6 col-sm-6">
                        <div class="addthis_native_toolbox"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 animated slideInLeft">
                        <div class="tab-content faq-cat-content">
                            <div class="tab-pane active in fade" id="faq-cat-1">
                                <div class="panel-group" id="accordion-cat-1">
                                    <div class="panel panel-default panel-faq">
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1" class="collapsed" aria-expanded="false">
                                                <h4 class="panel-title overview">Overview<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div>
                                        <div id="faq-cat-1-sub-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <p><span lang="">{{$entrepreneur[0]->overview}}</span></p>
                                                <a href="#" data-toggle="modal" data-target="#businessdeailsmodal">Business Plan Summary</a>            
                                                <br>
                                                <a target="_blank" href="http://"> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default panel-faq">
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-2" class="collapsed" aria-expanded="false">
                                                <h4 class="panel-title summary">Summary<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                            </a>
                                        </div>
                                        <div id="faq-cat-1-sub-2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body summery-body">
                                                <div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 prior-year">
                                                        <p>Prior Year Revenue</p>
                                                        <h1>{{$entrepreneur[0]->p_yr_revenue}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 current-year">
                                                        <p>Current Year Revenue</p>
                                                        <h1>{{$entrepreneur[0]->c_yr_revenue}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 next-year">
                                                        <p>Next Year Revenue</p>
                                                            <h1>{{$entrepreneur[0]->n_yr_revenue}}</h1>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="padding-top:5px;">
                                                    <div class="text-center employees">Employees<h4>{{$entrepreneur[0]->no_employees}}</h4></div>
                                                    <div class="text-center sub-industry">Sub-Industry<h4>Diaspora, Social Entrepreneur, Uncategorized, Women, Youth</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animated slideInRight">
                        <div class="right-content">
                            @if(Session::get('groupid') > '1' && Session::get('groupid') < '5')
                            <div class="btn-invest  btn-campaign"> <img src="{{url('/assets_new')}}/images/Invest-bl-icon.png" width="49" height="35" alt="" /><a data-toggle="modal" data-target="#donationsmodal" href="#"><span> Donation</span></a><div id="donatModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            </div></div>
                            @endif
                            
                            <div class="btn-businessplan  btn-invest">
                                <img src="{{url('/assets_new')}}/images/business-plan-icon.png" alt="" pagespeed_url_hash="53345294" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="49" height="35"><a href="" target="new"><span>Business Plan</span></a>
                           </div>
                            <div>
                                <p>Funding Type</p>
                                <span>{{$entrepreneur[0]->fund_type}}</span>
                            </div>
                            <div>
                                <p>Bussiness Stage</p>
                                <span><span lang="">Idea to pilot (experimentation)</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade in" id="donationsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Business Plan Summary</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/funding" method="post" id="payment-form">
                            {{csrf_field()}}
                            
                            <div class="form-row">
                            <label for="card-element">
                              Credit or debit card
                            </label>
                            <div id="card-element">
                              <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            </div>
                            <div class="input-group">
                                <label>Amount (USD)</label>
                                    <input class="form-control" type="number" name="amount" placeholder="Enter Amount" required>  
                            </div>
                            <label>Payment</label>
                            <select name="pay_type" class="form-control" required="">
                                <option value="onetime">Onetime</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                            <label>Comments</label>
                            <textarea class="form-control" placeholder="Enter Comments" name="comments" rows="2"></textarea><br>
                            <input type="hidden" name="project_id" value="{{$entrepreneur[0]->created_by}}">
                            <button class="btn-businessplan btn-primary">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade in" id="businessdeailsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Business Plan Summary</h4>
                    </div>
                    <div class="modal-body">
                        <ul class="business-details">
                            <li><h3>Idea</h3><span lang=""><p>{{$entrepreneur[0]->idea}} </p></span></li>
                            <li><h3>Business Model</h3><span lang=""><p>{{$entrepreneur[0]->women_model}}</p></span></li>
                            <li><h3>Customer</h3><span lang=""><p>{{$entrepreneur[0]->customer}}</p></span></li>
                            <li><h3>Market</h3><span lang=""><p>{{$entrepreneur[0]->market}}</p></span></li>
                            <li><h3>Industry</h3><span lang="">{{$entrepreneur[0]->industry}}</span></li>
                            <li><h3>Product</h3><span lang="">{{$entrepreneur[0]->product}}</span></li>
                            <li><h3>Campaign</h3><span lang="">{{$entrepreneur[0]->campaign}}</span></li>
                            <li><h3>Budget</h3><span lang="">{{$entrepreneur[0]->budget}}</span></li>
                            <li><h3>Pitch</h3>{{$entrepreneur[0]->pitch}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="sponsonrs animated slideInLeft">
            <div class="container-fluid">
                <marquee scrollamount="5" onmouseover="this.stop();" onmouseleave="this.start();">
                    <a href="#" target="_blank">
                        <img src="{{url('/assets_new')}}/images/ctanew.png" alt="CTA" pagespeed_url_hash="884728392" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="250" height="100">
                    </a>
                    <a href="#" target="_blank">
                        <img src="{{url('/assets_new')}}/images/columbia.png" alt="Columbia Women School" pagespeed_url_hash="2321047071" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="250" height="100">
                    </a>
                </marquee>
            </div>
        </section>
        <!-- End Inner Contents -->                 
     <script>

// Create a Stripe client.
var stripe = Stripe('pk_test_5n726IGSPr6fUut6JPKdj5cj');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  //console.log(token);
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>                    
@endsection