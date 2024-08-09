<div class="video-outer-wrapper">
    <div class="video-inner-wrapper">
        <?php
        if(!$this->params["isVideoURLExternal"]){                
        ?>
        <video 
            id="header_video"
            class="video-resource"
            <?php if($this->params["video_autoplay"]){ echo " autoplay muted ";} ?>
            <?php if($this->params["video_loop"]){ echo " loop ";} ?>
            <?php if($this->params["video_controls"]){ echo " controls ";} ?>
        >
            <source src="<?php echo $this->params["internalVideoURL"]?>">
        </video>
        <?php
        }
        else{
            $temp = str_replace("watch?v=","embed/", $this->params["externalVideoURL"] );
            $videoId = str_replace("https://www.youtube.com/watch?v=","",$this->params["externalVideoURL"]);

            $ruta =  $temp. "?version=3";
            if($this->params['video_autoplay']){
                $ruta .= "&mute=1&autoplay=1";
            }
            if($this->params['video_loop']){
                $ruta .= "&loop=1&playlist=" . $videoId;
            }
        ?>
        <iframe width="560" height="315" src="<?php echo $ruta; ?>" class="video-resource" title="" frameborder="0"  allowfullscreen></iframe>
        <?php    
        }
        ?>
    </div>

    <?php
    if(!$this->params["isVideoURLExternal"] && $this->params["custom_mute_control"])
    {
    ?>
    <div class="boton-mute">
        <i 
            id="boton-unmute" 
            class="fas fa-volume-up" 
            onclick="unmuteVideo()"
            style="display:<?php if($this->params["video_autoplay"]){ echo "block";} ?>;"                    
        >
        </i>
        <i 
            id="boton-mute" 
            class="fas fa-volume-mute" 
            onclick="muteVideo()"
            style="display:<?php if($this->params["video_autoplay"]){ echo "none";} ?>;"
        >
        </i>
    </div>
    <?php
    }
    ?>
</div>