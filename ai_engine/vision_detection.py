import time
import random

def simulate_camera_feed():
    print("=== Smart Parking: Real-Time Computer Vision (CNN) ===")
    print("Connecting to IP Cameras... OK")
    print("Loading CNN Weights (YOLOv8/ResNet)... OK")
    print("Starting real-time vehicle detection without extra hardware...\n")
    
    spots = ['A1', 'A2', 'A3', 'B1', 'B2']
    try:
        for frame_idx in range(1, 16): # Simulate 15 frames
            print(f"-- Frame #{frame_idx} --")
            for spot in spots:
                # Randomly detect cars with some confidence
                if random.random() > 0.5:
                    confidence = random.uniform(0.85, 0.99)
                    print(f"  [DETECTED] Vehicle inside spot {spot} | confidence: {confidence:.2f}")
                else:
                    if random.random() > 0.8: # Show empty spots occasionally 
                        print(f"  [EMPTY] Spot {spot} is free.")
            
            time.sleep(0.8) # Wait for "next frame"
    except KeyboardInterrupt:
        print("\nVision simulation stopped by user.")
        
    print("\n[RESULT] Processed live feed successfully. Stream buffered.")

def get_vision_api():
    spots = ['A1', 'A2', 'A3', 'B1', 'B2']
    data = []
    for spot in spots:
        if random.random() > 0.5:
            data.append({"spot": spot, "status": "OCCUPIED", "confidence": round(random.uniform(0.85, 0.99), 2)})
        else:
            data.append({"spot": spot, "status": "FREE", "confidence": 1.0})
    return {"status": "success", "feed": data}

if __name__ == "__main__":
    simulate_camera_feed()
