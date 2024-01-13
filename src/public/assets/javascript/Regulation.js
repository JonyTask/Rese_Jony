$(window).on("resize load",function(){
    const NameRegulation = $("#name_regulation");
    const RightContainer = $(".right_container");
    const ContainerSet = RightContainer.offset();

    NameRegulation.css({"padding-left":ContainerSet.left});
});