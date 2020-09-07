@extends('principal')
@section('contenido')
<template v-if="menu==0">
<h1> contenido del menu 0</h1>
</template>

<template v-if="menu==1">
    <persona :menu="menu" @updating-menu="updateMenu"></persona>
</template>

<template v-if="menu==2">
    <conyugue :menu="menu" @updating-menu="updateMenu"></conyugue>
</template>

<template v-if="menu==3">
    <credito :menu="menu" @updating-menu="updateMenu"></credito>
</template>

<template v-if="menu==4">
    <ingreso :menu="menu" @updating-menu="updateMenu"></ingreso>
</template>

<template v-if="menu==5">
    <otroingreso :menu="menu" @updating-menu="updateMenu"></otroingreso>
</template>

<template v-if="menu==6">
    <otroprestamo :menu="menu" @updating-menu="updateMenu"></otroprestamo>
</template>

<template v-if="menu==7">
    <prestamo :menu="menu" @updating-menu="updateMenu"></prestamo>
</template>

<template v-if="menu==8">
    <bien :menu="menu" @updating-menu="updateMenu"></bien>
</template>

<template v-if="menu==9">
    <success :menu="menu" @updating-menu="updateMenu"></success>
</template>










  
@endsection