from fastapi import FastAPI
from predict_availability import get_prediction_api
from vision_detection import get_vision_api
from adaptive_ai import trigger_recalibration_api

app = FastAPI(title="Smart Parking AI Engine", description="Provides simulated AI module data for Laravel integration.")

@app.get("/api/predict")
def predict_availability():
    """Returns the mock 30-min forecast."""
    return get_prediction_api()

@app.get("/api/vision-feed")
def vision_feed():
    """Returns the mock live array of vehicle bounding boxes."""
    return get_vision_api()

@app.post("/api/recalibrate")
def recalibrate_model():
    """Triggers the mock learning loop."""
    return trigger_recalibration_api()

if __name__ == "__main__":
    import uvicorn
    print("\nStarting AI Engine Server...")
    print("FastAPI is running on: http://127.0.0.1:8001")
    uvicorn.run(app, host="127.0.0.1", port=8001)
