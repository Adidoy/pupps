
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('code','Sector Code') }}
        {{ Form::text('code', isset($sector->sectorcode) ? $sector->sectorcode : old('sectorcode'),[
            'class'=>'form-control',
            'placeholder'=>'Sector Code'
        ]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('name','Sector Name') }}
        {{ Form::text('sectorName', isset($sector->sectorname) ? $sector->sectorname : old('sectorname'),[
            'class'=>'form-control',
            'placeholder'=>'Sector Name'
        ]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('sectorHead','Sector Head') }}
        {{ Form::text('sectorHead', isset($sector->sectorhead) ? $sector->sectorhead : old('sectorhead'),[
            'class'=>'form-control',
            'placeholder'=>'Full Name of Sector Head'
        ]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('sectorHeadPosition','Designation') }}
        {{ Form::text('sectorHeadPosition', isset($sector->sectorheadposition) ? $sector->sectorheadposition : old('sectorheadposition'),[
            'class'=>'form-control',
            'placeholder'=>'Designation of Sector Head'
        ]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('sectorAssistHead','Assistant to the Sector Head') }}
        {{ Form::text('sectorAssistHead', isset($sector->assisthead) ? $sector->assisthead : old('assisthead'),[
            'class'=>'form-control',
            'placeholder'=>'Full Name of the Assistant to the Sector Head'
        ]) }}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('sectorAssistHeadPosition','Designation') }}
        {{ Form::text('sectorAssistHeadPosition', isset($sector->assistheadposition) ? $sector->assistheadposition : old('assistheadposition'),[
            'class'=>'form-control',
            'placeholder'=>'Designation of the Assistant to the Sector Head'
        ]) }}
    </div>
</div>