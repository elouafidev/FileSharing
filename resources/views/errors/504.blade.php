@extends('errors::minimal')

@section('title', __('Erreur de délai d\'attente de la passerelle'))
@section('code', '503')
@section('message', __('Nous sommes vraiment désolés pour la gêne occasionnée. Il semble que notre serveur n\'ait pas reçu de réponse dans les délais.'))
